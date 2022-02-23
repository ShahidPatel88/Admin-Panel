<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\EmailTemplateRepositoryInterface;
use App\Http\Requests\ValidateEmailTemplate;

class EmailTemplatesController extends Controller
{
    protected $emailTemplateRepositoryInterface;

    public function __construct(EmailTemplateRepositoryInterface $emailTemplateRepositoryInterface)
    {
        $this->emailTemplateRepositoryInterface = $emailTemplateRepositoryInterface;
    }

    public function index()
    {
        $email_templates = $this->emailTemplateRepositoryInterface->getAllEmailTemplates();
        return view('backend.email-templates.index', compact('email_templates'));
    }
    public function create()
    {
        $email_events = $this->emailTemplateRepositoryInterface->getEmailEventsTitles();
        return view('backend.email-templates.create', compact('email_events'));
    }

    public function store(ValidateEmailTemplate $request)
    {
        $this->emailTemplateRepositoryInterface->storeEmailTemplate($request);
        return redirect()->route('admin.email-template')->with('success', 'Data Created Successfully.');
    }

    public function edit($id)
    {
        $email_events = $this->emailTemplateRepositoryInterface->getEmailEventsTitles($id);
        $template = $this->emailTemplateRepositoryInterface->getEmailTemplateDetails($id);
        return view('backend.email-templates.edit', compact('template', 'email_events'));
    }

    public function update(ValidateEmailTemplate $request, $id)
    {
        $this->emailTemplateRepositoryInterface->updateEmailTemplate($request, $id);
        return redirect()->route('admin.email-template')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id)
    {
        $this->emailTemplateRepositoryInterface->deleteEmailTemplate($id);
        return redirect()->route('admin.email-template')->with('success', 'Data Deleted Successfully.');
    }
}
