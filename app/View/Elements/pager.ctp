
    <?php echo ($this->Paginator->hasPrev()) ? $this->Paginator->first('&laquo;', array('class' => 'first', 'escape' => false)) : '<span class="disabled">&laquo;</span>' ?>  
    <?php echo $this->Paginator->prev('&lsaquo;', array('escape' => false), null, array('class' => 'disabled', 'tag' => 'span', 'escape' => false)); ?>  
    <?php echo $this->Paginator->numbers($pager_numbers); ?>  
    <?php echo $this->Paginator->next('&rsaquo;', array('escape' => false), null, array('class' => 'disabled', 'tag' => 'span', 'escape' => false)); ?>  
    <?php echo ($this->Paginator->hasNext()) ? $this->Paginator->last('&raquo;', array('class' => 'last', 'escape' => false)) : '<span class="disabled">&raquo;</span>' ?>  

