 <?php
 
 class Job{
    private $title;
    private $description;
    public $visible = true;
    public $months;
    

    public function __construct($title, $description)
    {
       $this->setTitle($title);
       $this->description = $description;
    }

    public function setTitle($title){
        $this->title = ($title == '') ? 'N/A' : $ticle;
    }
    public function getTitle(){
        return $this->title;
    }


    public function getDurationAsString($months)
    {
        $years = floor($this->months / 12);
        $years = ($years > 0) ? $years . ' years' : '';

        $extraMoths = $this->months % 12;
        $extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';
        
        return "$years $extraMoths";
    }
}
$job1 = new Job('PHP developer', 'Este es la descripción para php');
$job1->months = 5;

$job2 = new Job('Python Dev',  'Este es la descripción para Python Dev');
$job2->months = 10;


$job3 = new Job('Node Dev', 'Este es la descripción para Node Dev');
$job3->months = 60;


$job2 = new Job('Devops', 'Este es la descripción para Devops');
$job2->months = 10;

$job2 = new Job('Fronted dev', 'Este es la descripción para Fronted dev');
$job2->months = 54;
$jobs = [
    $job1,
    $job2,
    $job3,
    $job4,

];



function printJob($job)
{
    if ($job->visible == false) {
        return;
    }

    echo ' <li class="work-position">';
    echo '<h5>' . $job->getTitle() . '</h5>';
    echo '<p>' . $job->description . '</p>';
    echo '<p>' . $job->getDurationAsString($job->months) . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';


}
