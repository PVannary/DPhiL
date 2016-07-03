<?php

/* about page displaying chapter history */
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
                $this->_pageContent = "<p>When Ms. Anh Ngoc Nguyen began her education at the University of Georgia, it was difficult to find friends who could understand and relate to her Asian background. In the predominantly white school of 30,000 students, minorities, especially Asians, were very under represented. Worse, was the lack of unity amongst the few Asians on campus. </p>
                        <p>In the Winter of 1998, Ms. Anh Ngoc Nguyen and Ms. Theresa Sung discussed the idea of creating an Asian-interest sorority at the University of Georgia. With the support of her family and friends, Ms. Nguyen began her quest to find other females who shared a common belief: promoting Asian awareness through sisterhood . Her quest led to the formation of the founding class. </p>
                        <p>The founders felt a need for an Asian-interest sorority to promote Asian awareness on campus. They wanted to educate their peers about the Asian culture and to strip away the stereotypes that were attributed to Asians. They felt that a sorority would serve the community much better than joining a club because they felt the Asian clubs were oftenlimited in serving the entire Asian community as a whole. Because these organizations were often segregated into their own ethnic backgrounds, they tended to promote their own culture. The founding sisters felt that Asian cultures could be better exhibited and promoted on campus through a sorority. </p>
                        <p>Also, the ever changing status and membership enrollments in these clubs varied from semester to semester due to the lack of mandatory attendance policies and motivation, making it difficult to form lasting friendships. The turnovers of officers at elections were often dramatic and often led to strife within the clubs. It was not a matter of who was the best person for the job, but who had the most support. </p>
                        <p>In addition, most students who move away from home to attend college get homesick. Thus, the sorority wanted to provide a sisterhood for girls with the guidance and support similar to that of a family. With these goals in mind, the founding class: Anh Ngoc Nguyen, Theresa Sung, Sarah Chong Mi Cho, Carmela deGuzman, Yvonne Minh Ta, Linh Khanh Do, and Rebecca Kim Stephenson took on the enormous task of creating Delta Phi Lambda on December 5, 1998. They suffered many setbacks and heartbreaks facing opposition from their school, peers, and competitors, but they were adamant in their beliefs and continued their mission to create an organization that nurtures the talents of its future members. </p>";
                break;
            case 'chapter_history':
                $this->_contentTitle = 'Chapter History';
                $this->_pageContent = " <p>On February 4, 2001, Delta Phi Lambda was officially established at Georgia State University. The founding class of five, Linda Tran, Vinci Kawn, Katie Lau, Seng Chanvelap, and Ka Xiong, embraced a future of exciting and inspiring events that suddenly faded with the sunset because their numbers lacked the ability to survive as an active chapter. Reawakening the organization would be up to future generations, willing to risk failure for a new flight.</p>
                        <p>It began with Ms. Jennifer Chow who embarked her first year of college at Georgia State University in the fall of 2004 seeking new challenges and opportunities. The lack of school spirit and school involvement from the Asian students motivated Ms. Chow to find an organization that would seek individuals who will change the image correspondent to the Asian population at Georgia State University. Jennifer discovered a pre-existing Delta Phi Lambda chapter at Georgia State University. At once, she emailed contacts listed on the GSU Delta Phi Lambda website. By contacting Ms. Le Luong, the UGA DFL president at that time, Jennifer Chow was introduced to founder Anh Ngoc Nguyen who provided information and encouraged her to bring the organization back to life on campus and introduced her to GSU freshman Lauren Soriano who was also interested in bringing back the sorority.</p>
                        <p>At first, Ms. Lauren Soriano had much skepticism towards any kind of sorority because of the lack of sisterhood she saw and heard about at Georgia State University. Nothing about being in a sorority intrigued her except for her older sister Stephanie, who attended the University of Georgia and was very adamant about Delta Phi Lambda and tried numerous times to get Lauren involved in the reactivation of Delta Phi Lambda at Georgia State University. Although Lauren knew the sorority was something she was interested in, she didn't pursue the sorority because of the fear of following in her sister's footsteps. Everything started to come together when Jennifer Chow contacted Lauren about recruiting girls to meet Anh Ngoc Nguyen. Lauren remembered that she met a girl, Lena Chen Quach, that was also interested in DFL at an international student association retreat and commited herself to reaching out to her as well.</p>
                        <p>In the summer of 2004, Lena Chen Quach was introduced to Jennifer and Lauren who were interested in the reactivation of Delta Phi Lambda at Georgia State University. Lena had entered Georgia State University as a freshman in the fall of 2003 with the anticipation of meeting new friends but immediately noticed that majority of the enrolled students commuted to school rather than stayed on campus, finding it hard to associate with other pupils. It was difficult to find peers that could relate to her Asian background because students there already had their own circle of friends established. She had signed up for Asian-interest clubs but she discovered that they lacked motivation in what they wanted to do. Instantly interested when Lena came across a Delta Phi Lambda rush flyer from the University of Georgia, she contacted Rachelle Garcia, President of the National Board by email, and was later contacted by the founder Anh Ngoc Nguyen.</p>
                        <p>Together, Jennifer, Lauren, and Lena worked together on a mission to find others who were also interested in joining the sorority. During Fall Rush, a fair amount of girls showed interest in being a part of the sorority, but only two of them met the crucial requirements to become Beta Charters. They are GaoLi Moua and Katherine Nguyen. These girls couldn't have done this without the help and support from Ms. Anh Nguyen, Ms. Ellen Tran, Ms. Stephanie Soriano, and Ms. Sarah Cho. Awakening a rising sun and hatching butterfly, the five Beta Charters form the new beginning for Delta Phi Lambda at Georgia State University. </p>";
                break;
            case 'preamble':
                $this->_contentTitle = 'Preamble';
                $this->_pageContent = ' <p>"We, the sisters of Delta Phi Lambda, pledge to wholly dedicate our mind, body, and spirit to the completion of our mission. We will seek to improve the image of the Asian American. We will achieve this by acknowledging and spreading our unique Asian heritage. The bond between the sisters will set an example for others in the Asian community. We will set this example by displaying the virtues of loyalty, honesty, respect, dedication, integrity, discipline, and academic excellence. We hold these virtues to be true and will execute them in every venture the sorority will undertake. Delta Phi Lambda will remain strong through unity, and our legacy will live on through the works of the sisters."</p>';
                break;
        }
    }

    protected function _getContentFromDatabase() {
        /* Database query here */
    }
}