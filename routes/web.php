<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Location APIs
    Route::get('/api/locations/states', [App\Http\Controllers\LocationController::class, 'getStates']);
    Route::get('/api/locations/districts/{state_id}', [App\Http\Controllers\LocationController::class, 'getDistricts']);
    Route::get('/api/locations/blocks/{district_id}', [App\Http\Controllers\LocationController::class, 'getBlocks']);
    Route::get('/api/locations/panchayats/{block_id}', [App\Http\Controllers\LocationController::class, 'getPanchayats']);
    Route::get('/api/locations/villages/{panchayat_id}', [App\Http\Controllers\LocationController::class, 'getVillages']);

    // User Management
    Route::resource('users', App\Http\Controllers\UserController::class);

    // Role & Permission Management
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    // Location Master
    Route::get('locations', [App\Http\Controllers\LocationMasterController::class, 'index'])->name('locations.index');
    Route::post('locations', [App\Http\Controllers\LocationMasterController::class, 'store'])->name('locations.store');
    Route::delete('locations/{id}', [App\Http\Controllers\LocationMasterController::class, 'destroy'])->name('locations.destroy');

    // Child Registration
    Route::resource('children', App\Http\Controllers\ChildController::class);
    Route::resource('renewals', App\Http\Controllers\ChildRenewalController::class);

    // Fund Requests
    Route::get('funds', [App\Http\Controllers\FundRequestController::class, 'index'])->name('funds.index');
    Route::post('funds', [App\Http\Controllers\FundRequestController::class, 'store'])->name('funds.store');
    Route::post('funds/{id}/approve', [App\Http\Controllers\FundRequestController::class, 'approve'])->name('funds.approve');
    Route::post('funds/{id}/reject', [App\Http\Controllers\FundRequestController::class, 'reject'])->name('funds.reject');

    // Passbook / Wallet History
    Route::get('wallet_history', [App\Http\Controllers\PassbookController::class, 'index'])->name('wallet.history');

    // Settings
    Route::get('settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [App\Http\Controllers\SettingController::class, 'store'])->name('settings.store');

    // Social Activity Management
    Route::resource('activity-categories', App\Http\Controllers\ActivityCategoryController::class);
    Route::resource('social-activities', App\Http\Controllers\SocialActivityController::class);

    // Gramin Pathshala
    Route::resource('pathshala-students', App\Http\Controllers\PathshalaStudentController::class);
    Route::resource('pathshala-attendance', App\Http\Controllers\PathshalaAttendanceController::class);
    Route::resource('pathshala-subjects', App\Http\Controllers\PathshalaSubjectController::class);
    Route::resource('pathshala-homework', App\Http\Controllers\PathshalaHomeworkController::class);
    Route::get('pathshala-exams/get-subjects', [App\Http\Controllers\PathshalaExamController::class, 'getSubjectsByClass'])->name('pathshala-exams.get-subjects');
    Route::resource('pathshala-exams', App\Http\Controllers\PathshalaExamController::class);
    Route::resource('pathshala-results', App\Http\Controllers\PathshalaResultController::class);
    
    // User Downloads
    Route::get('user-downloads/id-card', [App\Http\Controllers\UserDownloadController::class, 'idCard'])->name('user-downloads.id-card');
    Route::get('user-downloads/certificate', [App\Http\Controllers\UserDownloadController::class, 'certificate'])->name('user-downloads.certificate');
    Route::get('user-downloads/visiting-card', [App\Http\Controllers\UserDownloadController::class, 'visitingCard'])->name('user-downloads.visiting-card');
    Route::get('user-downloads/banner', [App\Http\Controllers\UserDownloadController::class, 'banner'])->name('user-downloads.banner');

    // Prints
    Route::get('pathshala-prints', [App\Http\Controllers\PathshalaPrintController::class, 'index'])->name('pathshala-prints.index');
    Route::get('pathshala-prints/id-card/{id}', [App\Http\Controllers\PathshalaPrintController::class, 'printIdCard'])->name('pathshala-prints.id-card');
    Route::get('pathshala-prints/certificate/{student_id}/{exam_id}', [App\Http\Controllers\PathshalaPrintController::class, 'printCertificate'])->name('pathshala-prints.certificate');
    Route::get('pathshala-prints/marksheet/{student_id}/{exam_id}', [App\Http\Controllers\PathshalaPrintController::class, 'printMarksheet'])->name('pathshala-prints.marksheet');
});

// Public Social Activity Gallery
// Public Student Portal
Route::get('/student-portal', [App\Http\Controllers\StudentPortalController::class, 'index'])->name('student.portal');

Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

// ===== Public Website Pages =====
Route::get('/', function () { return view('website.index'); })->name('website.home');
Route::get('/about',     function () { return view('website.about'); })->name('website.about');
Route::get('/services',  function () { return view('website.services'); })->name('website.services');
Route::get('/bal-vivah', function () { return view('website.bal-vivah'); })->name('website.bal-vivah');
Route::get('/gallery-page', function () { return view('website.gallery'); })->name('website.gallery');
Route::get('/apply',     function () { return view('website.apply'); })->name('website.apply');
Route::get('/contact',   function () { return view('website.contact'); })->name('website.contact');
Route::post('/contact',  function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name'    => 'required|string|max:100',
        'mobile'  => 'required|digits_between:10,12',
        'subject' => 'required|string',
        'message' => 'required|string|min:10',
    ]);
    // TODO: save to DB or send email
    return back()->with('success', 'Thank you! Your message has been received. We will contact you soon.');
})->name('website.contact.post');

Route::get('/donate', function () {
    return view('website.donate');
})->name('website.donate');

Route::post('/donate', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'donor_name'     => 'required|string|max:100',
        'donor_phone'    => 'required|digits_between:10,12',
        'amount'         => 'required|numeric|min:1',
        'transaction_id' => 'required|string|max:100',
        'payment_mode'   => 'required|string',
        'remarks'        => 'nullable|string|max:255',
    ]);

    try {
        if (\Schema::hasTable('donations')) {
            $exists = \DB::table('donations')->where('transaction_id', $request->transaction_id)->exists();
            if ($exists) {
                return back()->withErrors(['transaction_id' => 'This Transaction ID has already been submitted.'])->withInput();
            }
            
            \DB::table('donations')->insert([
                'donor_name'     => $request->donor_name,
                'donor_phone'    => $request->donor_phone,
                'amount'         => $request->amount,
                'transaction_id' => $request->transaction_id,
                'payment_mode'   => $request->payment_mode,
                'remarks'        => $request->remarks,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        } else {
            \Log::info('Donations table does not exist. Submitted info: ' . json_encode($request->all()));
        }
    } catch (\Exception $e) {
        \Log::error('Donation submission error: ' . $e->getMessage());
    }

    return back()->with('success', 'Thank you! Your donation details have been submitted. Our team will verify and update your receipt shortly.');
})->name('website.donate.post');


