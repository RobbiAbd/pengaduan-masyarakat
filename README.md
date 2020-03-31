# pengaduan-masyarakat

Admin\
Username : admin\
Pass : 123456

Petugas\
Username : petugas\
Pass : 123456

Masyarakat\
Username : masyarakat\
Pass : 123456




![Alt text](assets/uploads/pengaduan-img.png?raw=true "Title")

# Codeigniter SBAdmin2

Just a simple codeigniter template using SBAdmin theme

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. You can change or modife fully this project 


### Folder structure

    .
    ├── aplications                   
    |   ├── controllers                
    |   |   ├── Admin.php
    |   |   ├── Auth.php
    |   ├── models
    |   ├── views
    |   |   ├── backend
    |   |   |   ├── 404_v.php
    |   |   |   ├── admin_v.php
    |   |   |   ├── animation_v.php
    |   |   |   ├── blank_v.php
    |   |   |   ├── border_v.php
    |   |   |   ├── button_v.php
    |   |   |   ├── chart_v.php
    |   |   |   ├── card_v.php
    |   |   |   ├── color_v.php
    |   |   |   ├── other_v.php
    |   |   |   ├── table_v.php
    |   |   ├── _part
    |   |   |    ├── backend_foot.php
    |   |   |    ├── backend_footer.php
    |   |   |    ├── backend_head.php
    |   |   |    ├── backend_sidebar.php
    |   |   |    ├── backend_topbar.php
    |   |   |    ├── login_footer.php
    |   |   |    ├── login_head.php
    |   |   ├── forgotpass_v.php
    |   |   ├── login_v.php
    |   |   ├── register_v.php


### Code structure in method ( function )

```
 public function index(){
        $data['title'] = 'Admin area';
        $this->load->view('_part/backend_head', $data);
        $this->load->view('_part/backend_sidebar_v');
        $this->load->view('_part/backend_topbar_v');
        $this->load->view('backend/admin_v');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }
```


### Prerequisites

* Min Php for support codeigniter3
* Web Server Apache or Ngix

### Installing

For installing this template you can direct download or clone this project

```
git clone repo-name
```

## Built With

* [Codeigniter3](https://www.codeigniter.com/)
* [Bootstrap](https://getbootstrap.com/)
* [Jquery](https://jquery.com/)
* [Jquery-easing](http://gsgd.co.uk/sandbox/jquery/easing/) 
* [Datatables](https://datatables.net/) 
* [Fontawesome-free](https://fontawesome.com/) 
* [Chart.js](https://www.chartjs.org/) 

## Spesial Thanks
* [Codeigniter](https://www.codeigniter.com)
* [Startbootstrap](https://startbootstrap.com/)



