<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="name">
                Form Name
                <span aria-hidden="true">*</span>
                <span class="sr-only">(required)</span>
            </label>
            <input id="name" name="name" type="text" class="form-control"
                value="{{ old('name', $form->name ?? '') }}"
                placeholder="Contact Form"
            >
        </div>

        <div class="form-group">
            <label for="redirect_url">
                Redirect Url (Optional)
            </label>
            <input id="redirect_url" name="redirect_url" type="text" class="form-control"
                value="{{ old('redirect_url', $form->redirect_url ?? '') }}"
                placeholder="/confirmation"
            >
            <p class="text-muted">
                Where to redirect users after they have submitted the form.<br>
                If empty, there is no redirect
            </p>
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="introduction">
                Form Introduction (Optional)
            </label>
            <textarea id="introduction" name="introduction"
              class="form-control" rows="4"
            >{{ old('introduction', $form->introduction ?? '') }}</textarea>
        </div>
        <p class="text-muted">
            Extra text to include at the top of the form
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="identifier">
                ID
                <span aria-hidden="true">*</span>
                <span class="sr-only">(required)</span>
            </label>
            <input id="identifier" name="identifier" type="text" class="form-control"
                value="{{ old('identifier', $form->identifier ?? '') }}"
                placeholder="contact-form"
            >
            <p class="text-muted">
                What will be used as the id in the form:
                <code>&lt;form id=""&gt;</code>
            </p>
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="classes">
                Classes (Optional)
            </label>
            <input id="classes" name="classes" type="text" class="form-control"
                value="{{ old('classes', $form->classes ?? '') }}"
                placeholder="form form-classes"
            >
            <p class="text-muted">
                What will be used as the classes on the form:
                <code>&lt;form class=""&gt;</code>
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="form-group">
            <label for="button_text">
                Button Text (Optional)
            </label>
            <input id="button_text" name="button_text"
               type="text" class="form-control" placeholder="Submit"
               value="{{ old(
                   'button_text',
                   $form->button_text ?? config(
                       'canvass.defaults.button_text',
                       'Submit'
                   )) }}"
            >
            <p class="text-muted">
                What will be used as the text of the submit button
            </p>
        </div>
    </div>

    <div class="col-md">
        <div class="form-group">
            <label for="button_classes">
                Button Classes (Optional)
            </label>
            <input id="button_classes" name="button_classes"
               type="text" class="form-control" placeholder="btn btn-primary"
               value="{{ old(
                   'button_classes',
                   $form->button_classes ?? config(
                       'canvass.defaults.button_classes',
                       'btn btn-primary'
                   )) }}"
            >
            <p class="text-muted">
                What classes to add to the submit button
            </p>
        </div>
    </div>
</div>

<hr>
<button class="btn btn-primary btn-lg" type="submit">
    Save Form
</button>
