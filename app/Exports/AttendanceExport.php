<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $currentDate = now()->toDateString(); // Get the current date
        $user = Auth::user(); // Get the authenticated user
       return Attendance::select('username', 'date', 'status')
        ->whereDate('date', $currentDate) // Filter records by current date
        ->where('class_id', $user->class_id) // Filter by authenticated user's class_id
        ->get()
        ->map(function ($attendance) {
            // Map status: 1 = Present, 0 = Absent
            $attendance->status = $attendance->status == 1 ? 'Present' : 'Absent';
            return $attendance;
        });

    
        
    }

    public function headings(): array
    {
        // Define the headings of your Excel/CSV file
        return [
            'User Name',
            'Date',
            'Status'
        ];
    }
}
