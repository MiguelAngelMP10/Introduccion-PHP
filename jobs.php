 <?php
    require_once 'vendor/autoload.php';
    
    use App\Models\{Job, Project, Printable};



 $job1 = new Job('PHP developer', 'Este es la descripción para php');
 $job1->months = 5;

 $job2 = new Job('Python Dev',  'Este es la descripción para Python Dev');
 $job2->months = 10;


 $job3 = new Job('Node Dev', 'Este es la descripción para Node Dev');
 $job3->months = 60;


 $job4 = new Job('Devops', 'Este es la descripción para Devops');
 $job4->months = 10;

 $job2 = new Job('Fronted dev', 'Este es la descripción para Fronted dev');

 $job2->months = 54;
 $jobs = [
    $job1,
    $job2,
    $job3,
    $job4,

];


$project1 =  new Project('Projecto 1', 'descripción proyecto 1');


$projects = [
    $project1
];

function printElement(Printable $job)
{
    if ($job->visible == false) {
        return;
    }

    echo ' <li class="work-position">';
    echo '<h5>' . $job->getTitle() . '</h5>';
    echo '<p>' . $job->getDescription() . '</p>';
    echo '<p>' . $job->getDurationAsString($job->months) . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';


}
