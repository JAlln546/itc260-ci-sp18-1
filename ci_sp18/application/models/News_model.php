<?php
//application/models/news_model.php

class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        } // end construct



        public function get_news($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        $query = $this->db->get('sp18_news');
                        return $query->result_array();
                }

                $query = $this->db->get_where('sp18_news', array('slug' => $slug));
                return $query->row_array();
        } // end of get_news method




        public function set_news()
        {
            $this->load->helper('url');

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

            return $this->db->insert('sp18_news', $data);
        } // end of set_news method



}//END News Model
