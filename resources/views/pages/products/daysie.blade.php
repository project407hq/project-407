<x-product-story
    product="daysie"
    name="Daysie"
    status="In development"
    summary="Daysie is being built to coordinate email and calendars across multiple accounts, preserve the boundaries between them, and bring people the decisions that need their attention."
    problem="One person can work across business, consulting, and personal accounts. Checking availability, choosing the correct identity, and keeping each context private makes even a simple meeting request more involved."
    solution="The current build includes Google multi-account onboarding, synced mail and agenda views, and reviewed reply and calendar actions. The broader direction is to carry commitments across email and calendar, using the right identity and user-approved rules. End-to-end assistant scheduling remains in development."
    :considerations="[
        ['title' => 'Use the right identity', 'description' => 'The sender and calendar need to be clear before an action is approved. When the intended account is ambiguous, the product needs to ask.'],
        ['title' => 'Respect private context', 'description' => 'Checking availability across accounts must preserve the boundaries between them. A private appointment should not become information shared with another organization.'],
        ['title' => 'Handle changing availability', 'description' => 'A calendar check is a snapshot. Stale information, disconnected accounts, and conflicting events need clear states before anything is created.'],
    ]"
    relevance="Daysie shows the questions behind software that connects multiple accounts: permissions, identity, privacy, and information that can change between review and action. I bring that same care to integrations and mobile workflows for your business."
    availability="Daysie is in development. The desktop web preview and mobile screenshots show the development build with sample accounts and calendar events."
/>
