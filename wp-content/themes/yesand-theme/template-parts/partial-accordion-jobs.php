<?php
/**     
$args['title'];
$args['content'];
$args['link']; // array of params for link ('title','url','target')
$args['index']; // index of element in current accordion space
*/
?>
<div class="accordion-content__column">
        <?php if($args['title']) { ?>
                <h4 class="accordion__title"><?php echo $args['title']?></h4>
        <?php } ?>
        <?php if($args['content']) { ?>
                <div class="accordion__text"><?php echo $args['content']?></div>
        <?php } ?>
        <?php if($args['link']!='') { ?>
                <div class="accordion__link">
                        <a class="para-5 text-red link-with-arrow" href="<?php echo $args['link']['url']?>" <?php echo ($args['link']['target'])?'target="'.$args['link']['target'].'"':''; ?>>
                                <?php echo $args['link']['title']?><span class="link-with-arrow__icon"></span>
                        </a>
                </div>
        <?php } ?>        
</div>
