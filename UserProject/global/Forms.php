<?php

class Forms {
    public $html;
    public $formData;
    public $validationErrors;

    public function __construct() {
        $this->formData = array();
        $this->validationErrors = array();
    }

    public function form_openNode($action, $id) {
        $this->html = '<form action="' . filter_var($action, FILTER_SANITIZE_SPECIAL_CHARS) . '" id="' . $id . '" method="POST" >';
    }

    public function text_input($labelString, $fieldName) {
        $data = '';
        if(isset($this->formData[$fieldName])) {
            $data = $this->formData[$fieldName];
        }

        $errorMsg = '';
        if(isset($this->validationErrors[$fieldName])) {
            $errorMsg = $this->validationErrors[$fieldName];
        }

        $this->html .= '
            <div class="form-froup">
                <label>' . $labelString . '</label>
                <input type="text" name="' . $fieldName . '" class="form-control" value="' . $data . '">
                <div class="alert alert-danger">' . $errorMsg . '</div>
            </div>';
    }

    public function email_input($labelString, $fieldName) {
        $data = '';
        if(isset($this->formData[$fieldName])) {
            $data = $this->formData[$fieldName];
        }

        $errorMsg = '';
        if(isset($this->validationErrors[$fieldName])) {
            $errorMsg = $this->validationErrors[$fieldName];
        }

        $this->html .= '
            <div class="form-froup">
                <label>' . $labelString . '</label>
                <input type="email" name="' . $fieldName . '" class="form-control" value="' . $data . '">
                <div class="alert alert-danger">' . $errorMsg . '</div>
            </div>';
    }

    public function password_input($labelString, $fieldName) {
        $data = '';
        if(isset($this->formData[$fieldName])) {
            $data = $this->formData[$fieldName];
        }

        $errorMsg = '';
        if(isset($this->validationErrors[$fieldName])) {
            $errorMsg = $this->validationErrors[$fieldName];
        }

        $this->html .= '
            <div class="form-froup">
                <label>' . $labelString . '</label>
                <input type="password" name="' . $fieldName . '" class="form-control" value="' . $data . '">
                <div class="alert alert-danger">' . $errorMsg . '</div>
            </div>';
    }

    public function submit_btn($name) {
        $this->html .= '<input type="submit" class="btn btn-success" name="' . $name . '" value="OK">';
    }

    public function empty_field($fieldName) {
        $data = '';
        if(isset($this->formData[$fieldName])) {
            $data = $this->formData[$fieldName];
        }

        if(empty($data)) {
            $this->validationErrors[$fieldName] = 'Empty field not allowed!';
        }
    }

    public function compareFileds($fieldName1, $fieldName2) {
        if($this->$formData[$fieldName1] !== $this->$formData[$fieldName2]) {
            $this->validationErrors[$fieldName2] = 'The fields value must be equal';
        }
    }

    public function email_filed($fieldName) {
        $data = '';
        if(isset($this->formData[$fieldName])) {
            $data = $this->formData[$fieldName];
        }

        if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $this->validationErrors[$fieldName] = 'Email must be valid!';
        }
    }

    public function uniq_error($fieldName, $msg) {
        $this->validationErrors[$fieldName] = $msg;
    }

    public function get_form($type) {
        switch (strtolower($type)) {
            case 'html':
                return $this->html . '</form>';
            case 'error':
                if(count($this->validationErrors) > 0) {
                    return false;
                } else {
                    return true;
                }
            default:
                die('wrong param: just html/error value allowed')
        }
    }

    public function set_form($what, $value) {
        switch (strtolower($type)) {
            case 'formdata' :
                $this->formData = $value;
                break;
            default:
                die('wrong param')
        }
    }
}

$form = new Forms();