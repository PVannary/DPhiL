<?php

/**
 * faqs class
 */
class FaqsModel extends AbstractModel {
    const MODEL_NAME = 'FAQs';

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
     * get a list of all faqs from database
     * 
     * @return void
     */
    public function getFaqs() {
        $faqs = array();
        $query     = $this->getFaqsFromDb();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $faq = $row;

            array_push($faqs, $faq);
        }

        return $faqs;
    }

    public function getFaqsFromDb() {
        $query = sprintf(
            "SELECT
                faq_table.faq_id AS id,
                faq_table.question AS question,
                faq_table.answer AS answer
            FROM
                faq_table"
        );

        return $this->_dbh->query($query);
    }
}