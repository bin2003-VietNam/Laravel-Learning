<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Job Title" required />
        <x-forms.input name="salary" label="Job salary" required />
        <x-forms.input name="location" label="Location" />

        <x-forms.select label="Schedule" name="schedule" required>
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
        </x-forms.select>

        <x-forms.input name="url" label="URL" placeholder="https://fdsfasdf.com"/>
        <x-forms.checkbox name="featured" label="Feature (Cost Extra)" />

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="laracast, video, education"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>