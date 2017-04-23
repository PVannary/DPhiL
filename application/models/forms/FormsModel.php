<?php

/**
 * forms model
 */
class FormsModel extends AbstractModel {
    const MODEL_NAME = 'Forms';

    /**
     * constructor
     *
     * @param obj   $dbh    [ database handler ]
     * @param array $params [ parameters sent by the url ]
     *
     * @return void
     */
    public function __construct($dbh) {
        parent::__construct($dbh);
    }

    /**
     * load all forms associated with model
     *
     * @return void
     */
    public function getForms($formNames = array()) {
        $forms = new stdClass();

        if ( !empty($formNames) ) {
            foreach( $formNames as $name ) {
                $formName     = ucfirst($name) . 'Form';
                $form         = new $formName($this->_dbh);
                $forms->$name = $form;
            }
        }

        return $forms;
    }
}