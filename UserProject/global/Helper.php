<?php

class Helper {
    public $message;
    public $url;

    public function redirect() {
        header('Location: ' . $this->url);
    }

    public function setFlashMsgSuccess() {
        $_SESSION['flash_message']['success'] = $this->uzenet;
        $this->redirect();
    }

    public function setFlashMsgWarning() {
        $_SESSION['flash_message']['warning'] = $this->uzenet;
        $this->redirect();
    }

    public function setFlashMsgDanger() {
        $_SESSION['flash_message']['danger'] = $this->uzenet;
        $this->redirect();
    }
}

$helper = new Helper();