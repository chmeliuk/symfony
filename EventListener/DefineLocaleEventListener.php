<?php

namespace PhpBenchmarksSymfony\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;

class DefineLocaleEventListener
{
    const EVENT_NAME = 'defineLocale';

    /** @var Request */
    protected $request;

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(Request $request, TranslatorInterface $translator)
    {
        $this->request = $request;
        $this->translator = $translator;
    }

    public function onDefineLocale()
    {
        $locales = ['fr_FR', 'en_GB', 'aa_BB'];
        $locale = $locales[rand(0, 2)];

        $this->request->setLocale($locale);
        $this->translator->setLocale($locale);
    }
}
