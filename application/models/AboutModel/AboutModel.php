<?php

/* about page displaying information about the chapter */
class AboutModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;

    const PAGE_TITLE = 'About - GSU Delta Phi Lambda';

    public function __construct($module, $params) {
        if ( !empty($params) ) {
            $this->_contentPage = $params[0];
            $this->_setContent();
        }

        $this->title = self::PAGE_TITLE;
    }

    protected function _setContent() {
        /* temporary code */

        switch($this->_contentPage) {
            case 'national_history':
                $this->_contentTitle = 'National History';
                $this->_pageContent  = $this->_getContentFromDatabase($this->_contentTitle);
                break;
            case 'chapter_history':
                $this->_contentTitle = 'Chapter History';
                $this->_pageContent  = $this->_getContentFromDatabase($this->_contentTitle);
                break;
            case 'preamble':
                $this->_contentTitle = 'Preamble';
                $this->_pageContent  = $this->_getContentFromDatabase($this->_contentTitle);
                break;
        }
    }

    protected function _getContentFromDatabase($documentTitle) {
        /* Database query here */
        $dbh = DB::getDbh();

        $query = $dbh->prepare(sprintf(
            "SELECT document_id,
                    title,
                    content
               FROM documents_table
              WHERE title = '%s'
              LIMIT 1",
                    $documentTitle
                ));
        $query->execute();

        while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
            return $row['content'];
        }
    }
}