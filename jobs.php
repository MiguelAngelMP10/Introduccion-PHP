 <?php
 $jobs = [
    [
        'title' => 'PHP developer',
        'description' => ' Este es la descripción para php',
        'visible' => true,
        'months' => 5     
    ],
    [
        'title' => 'Python Dev',
        'visible' => true,
        'months' => 10
    ],
    [
        'title' =>  'Devops',
        'visible' => true,
        'months' => 10
        
    ],
    [
        'title' =>  'Node Dev',
        'visible' => true,
        'months' => 60
    ],
    [
        'title' =>  'Fronted dev',
        'visible' => true,
        'months' => 54
        ]
    ]; 
    
    
    function getDuration($months){
        $years = floor($months / 12);
        $years = ($years > 0) ? $years.' years' :'';
        
        $extraMoths = $months % 12;
        $extraMoths = ($extraMoths > 0) ? $extraMoths.' months' :'';
        
        return  "$years $extraMoths";
    }
    
    function printJob($jobs){
        
        if ($jobs['visible'] == false) {
            return;
        }
        
        echo ' <li class="work-position">';
        echo '<h5>'.$jobs['title'].'</h5>';
        echo '<p>'.$jobs['description'].'</p>';
        echo '<p>'.getDuration($jobs['months']).'</p>';
        echo '<strong>Achievements:</strong>';
        echo '<ul>';
        echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
        echo '</ul>';
        echo '</li>';
    }