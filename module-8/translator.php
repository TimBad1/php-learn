<?php

    class Translator {
        private $dictionary = [ 'en' => [], 'de' => []];
        private $language;

        public function __construct($language) {
            $this->language = $language;
            // En
            $this->addWord('лес', 'forest', 'en');
            $this->addWord('работа', 'work', 'en');

            // De
            $this->addWord('лес', 'Wald', 'de');
            $this->addWord('работа', 'Arbeit', 'de');
        }

        public function addWord(string $russianWord, string $translation, $language) {
            if (array_key_exists($translation, $this->dictionary[$this->language])) {
                return;
            }
            $this->dictionary[$this->language][$translation] = $russianWord;
        }

        public function translate($foreingWord) {
            if (array_key_exists($foreingWord, $this->dictionary[$this->language])) {
                return $this->dictionary[$this->language][$foreingWord] . PHP_EOL;
            }
            return false;
        }
    }

    $translatorEn = new Translator('en');
    $translatorDe = new Translator('de');

    echo $translatorEn->translate('work') . PHP_EOL;
    echo $translatorDe->translate('Wald') . PHP_EOL;