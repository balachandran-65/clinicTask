<div>
    <main>
        <div class=" container px-5 my-5 mx-auto">
            <!-- Review section start  -->

            <h1 class=" text-lg font-bold text-center hidden md:block font-title">Review and Confirm Your Details</h1>

            <div class=" flex gap-3 md:hidden">
                <div class=" mt-1">
                    <img src="/icons/arrow.svg" alt="">
                </div>
                <div>
                    <h1 class=" text-lg font-bold leading-none font-title">Review and Confirm</h1>
                    <h1 class=" text-lg font-bold leading-none font-title">Your Details</h1>
                </div>
            </div>
            <!-- Review section end  -->

            <!-- Paragraph section start  -->
            <div class=" mt-4 lg:mt-10">
                <p class=" text-sm text-[#6B7280] font-normal md:text-center">You're just one step away from scheduling your online consultation. Please take a moment to review the details you've provided to ensure they're correct</p>
            </div>
            <!-- Paragraph section end  -->

            <!-- Desktop grid section start  -->
            <div class=" grid lg:grid-cols-3 md:grid-cols-1 md:gap-16  xl:mx-16 md:mt-16">
                 <!-- Details For Review section start  -->
            <div class=" border border-[#878787] shadow-[0px_1px_3px_0px_rgba(0,0,0,0.16)] rounded-lg py-6 px-5 mt-6">
                <h1 class=" font-medium underline underline-offset-1">Details For Review</h1>
                <div class=" flex items-center justify-between mt-7">
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/doctor.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">Doctor Name</span>
                    </div>
                    <span class=" text-sm font-semibold">{{ session('doctor_name') }}</span>
                </div>
                <div class=" flex items-center justify-between mt-4">
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/date-1.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">Date</span>
                    </div>
                    <span class=" text-sm font-semibold">{{ session('slot_date') }}</span>
                </div>
                <div class=" flex items-center justify-between mt-4">
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/time-1.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">Time</span>
                    </div>
                    <span class=" text-sm font-semibold">{{ session('slot_time') }}</span>
                </div>
            </div>
            <!-- Details For Review section end  -->

            <!-- Your Information section start  -->
            <div class=" border border-[#878787] shadow-[0px_1px_3px_0px_rgba(0,0,0,0.16)] rounded-lg py-6 px-5 mt-7">
                <h1 class=" font-medium underline underline-offset-1">Your Information</h1>
                <div class=" flex items-center justify-between md:gap-x-2 mt-7">
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/profile.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">Name</span>
                    </div>
                    <span class=" text-sm font-semibold">{{ session('patient_name') }}</span>
                </div>
                <div class=" flex items-center justify-between md:gap-x-2 mt-4"> 
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/message.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">Email</span>
                    </div>
                    <span class=" text-sm font-semibold">{{ session('patient_email') }}</span>
                </div>
                <div class=" flex items-center justify-between md:gap-x-2 mt-4">
                    <div class=" flex items-center gap-1.5">
                        <img src="/assets/icons/phone-1.svg" alt="">
                        <span class=" text-sm text-[#6B7280] font-medium">PhoneNumber</span>
                    </div>
                    <div class=" text-sm font-semibold">+91 {{ session('patient_number') }}</div>
                </div>
            </div>
            <!-- Your Information section end  -->

            <!-- Health Concerns section start  -->
            <div class=" border border-[#878787] shadow-[0px_1px_3px_0px_rgba(0,0,0,0.16)] rounded-lg py-6 px-5 mt-7">
                <h1 class=" font-medium underline underline-offset-1">Health Concerns</h1>
                <p class=" text-sm font-normal mt-7" wire:model="patient_health_concern=">{{ session('patient_health_concern') }} </p>
            </div>
            <!-- Health Concerns section end  -->
            </div>

            <!-- Desktop grid section end  -->

           

            <!-- Button section start  -->
            <div class=" flex justify-center mt-10 lg:mt-40">
                <button
                class="text-black lg:w-[40%] bg-[#A4CB6A] font-semibold mb-6 w-full text-center py-3 rounded-lg border-[#212245] border-t border-r-4 border-b-4 border-l" 
                wire:click="confirmPay('{{ session('doctor_id') }}','{{ session('patient_id') }}','{{ session('slot_date') }}','{{ session('slot_time') }}','{{ session('patient_health_concern') }}','{{ session('doctor_fee') }}')">Confirm & Pay</button>
            </div>
            <!-- Button section end  -->
        </div>
    </main>
</div>
