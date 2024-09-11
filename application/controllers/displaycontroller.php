<?php
class DisplayController extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        // Load the database library
        $this->load->database();
        // Load the model
        $this->load->model('displaymodel');
    }
    function display($offset = 0)
    {
        $limit = 2;             #1
        $this->load->model('displaymodel');
        $result['contents'] = $this->displaymodel->getRows($limit, $offset);
        $result['numOfRows'] = $this->displaymodel->countRows();
        $this->load->library('pagination'); #2
        $this->load->library('table');
        $config = array(
            'base_url' => 'http://localhost/ci2/index.php/displaycontroller/display',
            'total_rows' => $result['numOfRows'][0]['count'],
            'per_page' => $limit,
            'num_links' => 2
        );                   #3
        $this->pagination->initialize($config);     #4
        $result['pagination'] = $this->pagination->create_links();  #5
        $this->load->view('displayview', $result);
    }
}



// Here’s the explanation:

//1 The idea is to fetch the records according to the limit set (this will also be record_per_page) and set the offset value in the URI segment. The initial offset value is 0.
//2 We loaded the pagination library.
//3 Pagination demands certain parameters to be initialised — we have created an array of such parameters. base_url is the link to which the page is to be reloaded after getting a hit on any page number; total_rows refers to the total records; per_page is the limit of records to show on one page; num_links is the maximum links allowed for display (after that, “First” and “Last” will appear).
// 4We initialised pagination with the above parameters.
//5 We fetched the created links into the pagination variable.