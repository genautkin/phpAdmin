<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
</script>
<?php 
if (isset($_SESSION['SuccessAlert']) ) : ?>
<?php $message = $_SESSION['SuccessAlert'];
 ?>
<script>
    setTimeout(()=> {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '<?=$message?>' ,
            showConfirmButton: false,
            timer: 1500
            })
    },1)
    
    </script>

<?php endif; ?>