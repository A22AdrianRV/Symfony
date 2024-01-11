<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinylController extends AbstractController
{
   
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];


        return $this->render('vinyl/homepage.html.twig',[
        'title'=> 'PB & Jams',
        'tracks'=> $tracks]);
    }

    #[Route('/browse/{slug}')]
    public function browse($slug=null): Response
    {
        // if ($slug) {
        //     $genre = 'Genre: '.(str_replace('-', ' ', $slug))->title(true);
        // } else {
        //     $genre = 'All Genres';
        // }

        $genre = $slug ? str_replace('-', ' ', $slug)->title(true) : null;
        return $this->render('vinyl/browse.html.twig',[
            'genre' => $genre
        ]);
    }
}


?>