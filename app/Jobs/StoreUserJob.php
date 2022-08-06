<?php

namespace App\Jobs;

use App\Mail\User\MailPassword;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = Str::random(10);
        $this->data['password'] = Hash::make($password);

        //dd($data);

        try {
            DB::beginTransaction();
            $user = User::query()->firstOrCreate(['email' => $this->data['email']], $this->data); // Созадание пользователя
            event(new Registered($user));
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            abort(500);
        }

        Mail::to($this->data['email'])->send(new MailPassword($password, $this->data['name']));
    }
}
