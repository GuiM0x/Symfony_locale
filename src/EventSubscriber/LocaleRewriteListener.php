<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LocaleRewriteListener implements EventSubscriberInterface
{
    private $defaultLocale;
    private $supportedLocales;

    /**
     * $defaultLocale and $supportedLocales injected from services.yaml
     */
    public function __construct(string $defaultLocale, string $supportedLocales)
    {
        $this->defaultLocale = $defaultLocale;
        $this->supportedLocales = explode("|", $supportedLocales);
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $oldUrl = $request->getPathInfo();
        $exploded = explode("/", $oldUrl);
        $locale = $request->getSession()->get("_locale", $this->defaultLocale);
        $newUrl = "/";
        if(!in_array($exploded[1], $this->supportedLocales)){
            $newUrl .= $locale . $oldUrl;
            $event->setResponse(new RedirectResponse($newUrl));
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            // must be registered before the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 101]],
        );
    }
}
