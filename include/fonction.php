    <?php

    function getCover($spec_id = 0) 
    {
        $picture = 'image/'.$spec_id;
        if (file_exists($picture)) 
        {
            return $picture;
        }
        return 'image/avatar.jpeg';
    }

    ?>