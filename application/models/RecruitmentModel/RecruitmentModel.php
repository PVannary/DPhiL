<?php

/* about page displaying recruitment information about the chapter */
class RecruitmentModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;
    protected $_menu     = array();
    protected $_faqArray = array();

    const PAGE_TITLE = 'Recruitment - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];
            $this->_faqArray = $this->_getFaqFromDatabase();
            $this->_setContent();
            $this->_setMenu();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _setMenu() {
        $this->_menu['header']  = 'FAQ';
        $this->_menu['content'] = array();

        foreach ( $this->_faqArray as $faqItem ) {
            $listItem = array(
                'title' => $faqItem['question'],
                'attribute' => ''
                );
            $this->_menu['content'][] = $listItem;
        }
    }

    protected function _setContent() {
        /* temporary code */

        switch($this->_contentPage) {
            case 'faqs':
                $this->_contentTitle = 'Recruitment FAQs';
                break;
        }
    }

    protected function _getFaqFromDatabase() {
        /* Database query here */
        $dbh         = DB::getDbh();
        $faqArray    = array();

        $query = $dbh->prepare(sprintf(
            "SELECT faq_id,
                    question,
                    answer
               FROM faq_table"
                ));
        $query->execute();

        while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
            $faqArray[$row['faq_id']] = $row;
        }

        return $faqArray;
    }
}