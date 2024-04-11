<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Form\TicketType;
use App\Repository\TicketRepository;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

#[Route('/ticket')]
class TicketController extends AbstractController
{
    #[Route('/', name: 'app_ticket_index', methods: ['GET'])]
    public function index(TicketRepository $ticketRepository): Response
    {
        $tickets = $ticketRepository->findAll();

    // Fetch event details for each ticket
    $eventDetails = [];
    foreach ($tickets as $ticket) {
        $eventId = $ticket->getEvent()->getId();
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', $this->generateUrl('app_event_show', ['id' => $eventId]));

        if ($response->getStatusCode() === 200) {
            $eventDetails[$ticket->getId()] = $response->toArray();
        } else {
            // Log error if event details cannot be fetched
            $this->logger->error('Failed to fetch event details for ticket ' . $ticket->getId());
        }
    }

    return $this->render('ticket/index.html.twig', [
        'tickets' => $tickets,
        'eventDetails' => $eventDetails,
    ]);
    }

    #[Route('/new', name: 'app_ticket_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ticket = new Ticket();
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticket);
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ticket_show', methods: ['GET'])]
    public function show(Ticket $ticket): Response
    {
        // Fetch event details using HttpClient
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', $this->generateUrl('app_event_show', ['id' => $ticket->getEvent()->getId()]));
        $event = $response->toArray();

        return $this->render('ticket/show.html.twig', [
            'ticket' => $ticket,
            'event' => $event, // Pass event details to the view
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ticket_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ticket_delete', methods: ['POST'])]
    public function delete(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ticket);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ticket_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/buy', name: 'app_ticket_buy')]
    public function buy(): Response
    {
        return $this->render('ticket/buy.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
