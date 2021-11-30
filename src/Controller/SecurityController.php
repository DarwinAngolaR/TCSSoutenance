<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    private $manager;
    private $password_hasher;

    public function __construct(EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->password_hasher = $passwordHasher;
        $this->manager = $manager;
    }
    /**
     * @Route("/register", name = "security_register")
     */

    public function register(
        Request $request,
        UserPasswordEncoderInterface $encoder
    ): Response {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);


        // Analyse de la requête par le formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données reçues du formulaire

            $password_hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($this->password_hasher->hashPassword($user,$user->getPassword()));

            $this->manager->persist($user);
            $this->manager->flush();
            return $this->redirectToRoute("security_login");
        }

        return $this->render('security/index.html.twig', [
            'controller_name' => 'Inscription',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/login", name ="security_login")
     */
    public function login(): Response{
        return $this->render('security/login.html.twig');
    }

     /**
     * @Route("/logout", name ="security_logout")
     */
    public function logout(){}
}
