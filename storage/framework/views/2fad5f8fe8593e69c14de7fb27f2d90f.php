<?php $__env->startSection('header'); ?>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Admin Dashboard - <?php echo e(Auth::user()->name); ?>

    </h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-600">
                    Welcome to the <strong><?php echo e(Auth::user()->name); ?></strong> Dashboard!
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/laravel/ecommerce/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>