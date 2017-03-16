<?php $__env->startSection('content'); ?>

    <b>uBooks: books for u</b><br>
    <form action="<?php echo e(action('ListingController@showCategoryOnly')); ?>">
        <select name="categories">
            <option value="0">All Subjects</option>
            <option value="1">Biology</option>
            <option value="2">Business</option>
            <option value="3">Computer Science</option>
            <option value="4">Education</option>
            <option value="5">English</option>
            <option value="6">Engineering</option>
            <option value="7">Human Kinetics</option>
            <option value="8">Mathematics</option>
            <option value="9">Physics</option>
    </select>
        <button type="submit">Submit</button>
    </form>
    <br>
    <a href = "<?php echo e(URL::to('create')); ?>"><button>Create New Listing</button></a>
    <br>

    <table>
        <tr>
        <th>Title</th>
        <th>Edition</th>
        <th>Condition</th>
        <th>Price</th>
        </tr>
   <?php $__currentLoopData = $booklistings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a href="listing/<?php echo e($listing->id); ?>" class="rowlink">
            <?php echo e($listing->name); ?>

            </a></td>
            <td>
            <?php echo e($listing->edition); ?>

            </td>
            <td>
            <?php echo e($listing->condition); ?>

            </td>
            <td>
            <?php echo e($listing->price); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>