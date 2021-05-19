<?php

namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $repoArticle;

    public function __construct(ArticleRepository $repoArticle){
        $this->repoArticle = $repoArticle;
    }
    
    
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
      //  $repo = $this->getDoctrine()->getRepository(Article::class);
         
        $articles = $this->repoArticle->findAll();

        return $this->render("home/index.html.twig", [
            'articles' => $articles
        ]);
    }

        /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render("home/about.html.twig");
    }
   /**
     * @Route("/view/{id}", name="view")
     */
    public function view($id): Response{
        // $repo = $this->getDoctrine()->getRepository(Article::class);

        $article = $this->repoArticle->find($id);

        return $this->render("home/view.html.twig", [
            'article' => $article,
        ]);
    }
}

