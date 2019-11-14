<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LocaleRewriteListener implements EventSubscriberInterface
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $oldUrl = $request->getPathInfo();
        $exploded = explode("/", $oldUrl);
        $locales = ["fr", "en"];
        $defaultLocale = "fr";
        $newUrl = "/";
        if(!in_array($exploded[1], $locales)){
            $newUrl .= $defaultLocale . $oldUrl;
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
