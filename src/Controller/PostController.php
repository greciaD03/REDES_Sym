<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Interaction;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private $em;
    /**
     * @param $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/post/{id}', name: 'app_post')]
    public function index($id): Response
    {
        $post = $this->em->getRepository(Post::class)->find($id);
        $custom_post = $this->em->getRepository(Post::class)->findPost($id);
        return $this->render('post/index.html.twig',[
            'post' => $post,
            'custom_post' => $custom_post
        ]);
    }

    /*#[Route('/', name: 'app_post')]
    public function index(Request $request): Response
    {
       $post = new Post();
       $form = $this->createForm(PostType::class, $post);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) {
        $user = $this->em->getRepository(User::class)->find(1);
        $post->setUser($user);
        $this->em->persist($post);
        $this->em->flush();
        return $this->redirectToRoute('app_post');
       }
       
       return $this->render('post/index.html.twig' , [
        'form' => $form->createView(),
       ]);  
    }/*

    /*#[Route('/post/{id}', name: 'app_post')]
    public function index($id): Response
    {
        $posts = $this->em->getRepository(Post::class)->findAll();
        return $this->render('post/index.html.twig',[
            'posts' => $posts,
        ]);
    }*/
    
    /*#[Route('/', name: 'app_post')]
    public function index(Request $request): Response
    {
       $post = new Post();
       $form = $this->createForm(PostType::class, $post);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()) {
        $user = $this->em->getRepository(User::class)->find(1);
        $post->setUser($user);
        $this->em->persist($post);
        $this->em->flush();
        return $this->redirectToRoute('app_post');
       }
       
       return $this->render('post/index.html.twig' , [
        'form' => $form->createView(),
       ]);  
    }*/

    /*public function __toString()
    {
        return $this->getPostType();
    }*/

    /*#[Route('/insert/post', name: 'insert_post')]
    public function insert() {
        $post = new Post();
        $user = $this->em->getRepository(User::class)->find(1);
        $post->setTitle('⛔D E N E G A D O')
        ->setDescription('Producto criticamente eliminado ⚠️ No apto para los dispositivos digitales, ni mucho MENOS analogos.')
        ->setCreationDate(new \DateTime())
        ->setUrl('https://www.erratas.com')
        ->setFile('[Trash]')
        ->setType('[OPINION]')
        ->setUser($user); 
        $this->em->persist($post);
        $this->em->flush();
        return new JsonResponse(['success' => true]);
    }*/

    #[Route('/update/post', name: 'insert_post')]
    public function insert() {
        $post = $this->em->getRepository(Post::class)->find(3);
        $post->setFile('🗑️');
        $this->em->flush();
        return new JsonResponse(['success' => true]);
    } 

    /*#[Route('/remove/post', name: 'insert_post')]
    public function insert() {
        $post = $this->em->getRepository(Post::class)->find(5);
        $this->em->remove($post);
        $this->em->flush();
        return new JsonResponse(['success' => true]);
    }*/

}
