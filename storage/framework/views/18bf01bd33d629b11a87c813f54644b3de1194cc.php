<?php $__env->startSection('content'); ?>

	<h1><?php echo e($listing->name); ?></h1>
	<h2>$<?php echo e($listing->price); ?></h2>
	<strong><?php echo e($listing->edition); ?> Edition</strong>
	<p><?php echo e($listing->description); ?></p>
	<p><?php echo e($listing->condition); ?></p>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>