<?php $__env->startSection('header'); ?>
    <h2 class="text-xl font-semibold text-gray-800 leading-tight">
        Admin Dashboard - <?php echo e(Auth::user()->name); ?>

    </h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Danh sách thành viên</h3>
                        <form class="flex gap-2" action="<?php echo e(route('admin.user.search')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?>
                            <input type="text" class="rounded-md border-gray-300" name="search" placeholder="Tìm kiếm">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                Tìm kiếm
                            </button>
                        </form>
                    </div>

                    <div class="flex gap-4 mb-6">
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            Trạng thái 1 <span class="text-gray-500">(10)</span>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            Trạng thái 2 <span class="text-gray-500">(5)</span>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            Trạng thái 3 <span class="text-gray-500">(20)</span>
                        </a>
                    </div>

                    <div class="flex gap-2 mb-6">
                        <select class="rounded-md border-gray-300">
                            <option>Chọn</option>
                            <option>Tác vụ 1</option>
                            <option>Tác vụ 2</option>
                        </select>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Áp dụng
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="p-4 w-4">
                                        <input type="checkbox" class="rounded border-gray-300">
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Họ tên</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Username
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quyền</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ngày tạo
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php if(session('success')): ?>
                                    <div
                                        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?>

                                <?php if(session('error')): ?>
                                    <div
                                        class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>

                                <?php if(!empty($users) && $users->count() > 0): ?>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="p-4"><input type="checkbox" class="rounded border-gray-300"></td>
                                            <td class="px-6 py-4"><?php echo e($i); ?></td>
                                            <td class="px-6 py-3 min-w-[100px]"><?php echo e($user->name); ?></td>
                                            <td class="px-6 py-4"><?php echo e($user->username ?? 'no username'); ?></td>
                                            <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                                            <td class="px-6 py-4">Administrator</td>
                                            <td class="px-6 py-4"><?php echo e($user->created_at); ?></td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-2">
                                                    <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>"
                                                        class="p-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <a href="<?php echo e(route('admin.user.delete', $user->id)); ?>"
                                                        onclick="return confirm('Are you sure you want to delete this user?')"
                                                        class="p-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php
                                        $name = request('search');
                                    ?>
                                    <tr>
                                        <td colspan="8" class="text-center p-4">No users with name "
                                            <?php echo e($name); ?>"
                                            found.</td>
                                    </tr>
                                <?php endif; ?>
                                <!-- More rows here -->
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 bg-white-50">
                        <nav class="flex justify-end  p-4 ">
                            <?php echo e($users->links()); ?>

                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/laravel/ecommerce/resources/views/admin/users/list.blade.php ENDPATH**/ ?>