

<?php $__env->startSection('contents'); ?>
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">EthJob AI Dashboard</h5>
        <!-- This is the card that will contain the iframe -->
        <div id="supportCard" style="display:none;">
            <iframe id="supportFrame" src="about:blank" style="width:100%; height:700px; border:double;"></iframe>
        </div>
    </div>
</div> 

<div class="card-tidio">
    <iframe src="https://www.tidio.com/panel/inbox/conversations/unassigned/7dd2551d4af34665a369569e4f8ff0d3" style="width:100%; height:500px; border:none" ></iframe>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    // When the support link is clicked
    $('#supportLink').click(function(e){
      e.preventDefault(); // Prevent the default link behavior
      // Set the source of the iframe to the Tidio support page
      $('#supportFrame').attr('src', 'https://www.tidio.com/panel/inbox/conversations/unassigned/7dd2551d4af34665a369569e4f8ff0d3');
      // Show the card containing the iframe
      $('#supportCard').show();
    });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/admin/support-info.blade.php ENDPATH**/ ?>