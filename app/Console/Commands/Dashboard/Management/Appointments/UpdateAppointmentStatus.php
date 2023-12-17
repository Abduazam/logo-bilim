<?php

namespace App\Console\Commands\Dashboard\Management\Appointments;

use Illuminate\Console\Command;
use App\Models\Dashboard\Management\Appointments\Appointment;
use App\Models\Dashboard\Information\Statuses\Appointments\AppointmentStatus;

class UpdateAppointmentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:update-appointment-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates appointment status';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $appointmentStatuses = AppointmentStatus::whereIn('key', ['pending', 'started'])
            ->pluck('id', 'key');

        $pendingStatusId = $appointmentStatuses['pending'];
        $startedStatusId = $appointmentStatuses['started'];

        $appointments = Appointment::where('appointment_status_id', $pendingStatusId)
            ->whereDate('created_date', now())
            ->whereTime('start_time', '<=', now())
            ->get();

        if ($appointments->isNotEmpty()) {
            Appointment::whereIn('id', $appointments->pluck('id'))
                ->update(['appointment_status_id' => $startedStatusId]);
        }
    }
}
