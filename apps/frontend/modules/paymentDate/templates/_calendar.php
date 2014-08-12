      <div class="page-header pull-right">
        <h3 class="date-title"></h3>        
        <div class="form-inline pull-right">
          <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< <?php echo __('Prev')?></button>
            <button class="btn btn-default" data-calendar-nav="today"><?php echo __('Today')?></button>
            <button class="btn btn-primary" data-calendar-nav="next"><?php echo __('Next')?> >></button>
          </div>
          <div class="btn-group">
            <button class="btn btn-warning" data-calendar-view="year"><?php echo __('Year')?></button>
            <button class="btn btn-warning active" data-calendar-view="month"><?php echo __('Month')?></button>
            <!--<button class="btn btn-warning" data-calendar-view="week"><?php //echo __('Week')?></button>-->
            <!--<button class="btn btn-warning" data-calendar-view="day">Day</button>-->
          </div>
        </div>
      </div>
      <div id="calendar"></div>
