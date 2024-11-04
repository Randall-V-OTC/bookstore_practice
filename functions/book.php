<?php

    class book {

        public $bookId = null;
        public $bookName = '';
        public $bookAuthor = '';
        public $bookPages = null;

        public function __construct($bookId, $bookName, $bookAuthor, $bookPages) {
            $this->bookId = $bookId;
            $this->bookName = $bookName;
            $this->bookAuthor = $bookAuthor;
            $this->bookPages = $bookPages;
        }

        public function getInfo($requestedInfo) {
            switch ($requestedInfo) {
                case "id": return $bookId;
                case "name": return $bookName;
                case "author": return $bookAuthor;
                case "page": return $bookPages;
                default: return false;
            }
            return false;
        }

    }

?>