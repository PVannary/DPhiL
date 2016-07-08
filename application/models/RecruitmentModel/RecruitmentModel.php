<?php

/* about page displaying recruitment information about the chapter */
class RecruitmentModel extends Model {
    protected $_contentPage;
    protected $_pageContent;
    protected $_contentTitle;

    const PAGE_TITLE = 'Recruitment - GSU Delta Phi Lambda';

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
            case 'faqs':
                $this->_contentTitle = 'Recruitment FAQs';
                $this->_pageContent = "<div class='row'>
                    <div class='col-sm-3'>
                        <h4>FAQs</h4>
                        <ul>
                            <li><a href='#'>What is recruitment?</a></li>
                            <li><a href='#'>Do I have to pay?</a></li>
                            <li><a href='#'>Do I have to be Asian or Asian-American in order to participate?</a></li>
                            <li><a href='#'>How often do you recruit new members?</a></li>
                            <li><a href='#'>How do I become eligible for a bid?</a></li>
                            <li><a href='#'>Who do I contact regarding recruitment?</a></li>
                        </ul>
                    </div>
                    <div class='col-sm-9' style='border-left: 2px solid #C3C8C8;'>
                        <label>What is recruitment?</label>
                        <p>Recruitment is a two-week period of events for interested female undergraduates to come out and learn about the Sisterhood of DPhiL.
                        This is a chance for interested ladies to meet and mingle with Sisters and find out if DPhiL is the right choice for them. There is
                        absolutely no obligation to join if you participate in recruitment.</p>
                        <label>Do I have to pay?</label>
                        <p>All recruitment events are <b>FREE</b> and rides will be provided by the Sisters. If you are planning on attending an event off
                        campus, please inform the Recruitment Team beforehand so that we know to expect you!</p>
                        <label>Do I have to be Asian or Asian-American in order to participate in recruitment?</label>
                        <p><b>ABSOLUTELY NOT!</b> Even though we are an Asian-interest sorority, we are in no way Asian-exclusive. Our Sisters come from a wide
                        variety of cultural backgrounds, interests, and talents. Each of our Sisters brings a unique aspect and perspective to our diverse
                        Sisterhood. We encourage all female undergraduates to come out to our recruitment events—regardless of ethnicity (or color, national
                        origin, age, religion, marital status, citizenship, sexual orientation, or disability for that matter!) Therefore, we continue to
                        encourage and invite all women to join, regardless of ethnicity.</p>
                        <p>Recruitment takes place in the first few weeks of every Fall and Spring semester.</p>
                        <label>How do I become eligible for a bid?</label>
                        <p>We require that potential new members attend <b>at least 2/3</b> of our recruitment events. If, for any reason, you cannot adhere
                        to these requirements, please contact our Recruitment Chair.</p>
                        <label>Who do I contact regarding recruitment?</label>
                        <p>For more information, please contact our Recruitment Chair, Current Chair, at recruitment@gsudeltaphilambda.org .</p>
                    </div>
                </div>";
                break;
        }
    }

    protected function _getContentFromDatabase() {
        /* Database query here */
    }
}