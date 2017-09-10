<?php

namespace App\Core\View;

class TwigViewer
{

    private $loader;
    private $twig;

    public function __construct($cachePath)
    {
        $this->loader = new \Twig_Loader_Filesystem();
        $this->twig = new \Twig_Environment($this->loader, []);
    }

    public function render(string $viewName, array $data = []): string
    {
        return $this->twig->render($viewName . '.twig', $data);
    }


    public function addPath(string $path, ?string $namespace = null): void
    {
        if (null === $namespace) {
            $namespace = \Twig_Loader_Filesystem::MAIN_NAMESPACE;
        }
        $this->loader->addPath($path, $namespace);
    }


}