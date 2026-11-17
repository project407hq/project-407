<x-service-page
    inquiry-service="support"
    title="Business Automation & Software Integrations | Project 407"
    description="Business process automation and API integrations with Kevin Whelan. Connect existing tools, reduce re-entry, and handle failed handoffs in MA, NH, and remotely."
    eyebrow="AUTOMATION + SOFTWARE INTEGRATIONS"
    headline="Business automation and API integrations that keep work"
    accent="moving."
    intro="I connect the tools your business relies on so your team can spend less time copying information and checking routine updates. Start with one repeated task. We’ll work out what can run automatically, what needs approval, and what should happen if a connection fails."
    :problems="[['Your team enters the same information more than once.', 'Customer, job, or operational data has to be copied manually between systems.'], ['Important handoffs depend on someone remembering.', 'Follow-ups, notifications, and status changes are inconsistent because the process is manual.'], ['The tools you rely on do not communicate.', 'Useful data is trapped in separate platforms, making reporting and coordination harder than necessary.']]"
    :deliverables="[['Workflow and automation assessment', 'I identify which repeated steps can run automatically and when a person still needs to decide.'], ['Third-party API integrations', 'Reliable connections between CRMs, forms, scheduling tools, payment systems, and business software.'], ['Notifications and data synchronization', 'Useful information moves to the correct system and the correct person at the correct time.'], ['Monitoring and ongoing support', 'Integrations are maintained and adjusted as external tools and business requirements change.']]"
    :outcomes="[['Fewer repetitive steps', 'The team spends less time copying information and checking routine status.'], ['More reliable handoffs', 'Important next actions happen consistently instead of depending on memory.'], ['Better connected operations', 'The systems you already use work together as a more coherent whole.']]"
    :engagements="[
        ['title' => 'Move a request between systems', 'description' => 'Connect a form or incoming request to the records your team uses. Define required fields, duplicate handling, and which exceptions need review.', 'deliverable' => 'A connection that checks incoming information and flags problems for the person responsible.'],
        ['title' => 'Prepare recurring follow-up for approval', 'description' => 'Use source records to prepare a reminder or next action. Recheck the current status before sending, and stop when a reply or record change makes the action inappropriate.', 'deliverable' => 'A background workflow with agreed approval rules, status checks, and action history.'],
        ['title' => 'Synchronize changing records', 'description' => 'Decide which system owns each field and when updates should move. Account for expired access, rate limits, retries, and conflicts.', 'deliverable' => 'An integration plan, tested update behavior, and agreed monitoring and support.'],
    ]"
    :stages="[
        ['title' => 'Map one recurring handoff', 'description' => 'Review the source and destination systems, API access, data ownership, frequency, and exceptions. First check whether the existing tools can already do the work.'],
        ['title' => 'Scope the connection and its limits', 'description' => 'Agree on the workflow, permissions, data mapping, approval rules, testing, fees, and timing. Identify third-party subscriptions or API limitations before implementation.'],
        ['title' => 'Test failures as well as successful runs', 'description' => 'Check duplicate events, unavailable services, changed records, and retries. Agree on who receives an exception notification and who maintains the integration when a vendor changes.'],
    ]"
    :related-links="[
        ['title' => 'Maeve: invoice follow-up with human approval', 'url' => route('products.maeve'), 'description' => 'Explore my own early-access product for invoice follow-up, including sample screens, approval decisions, and changing payment or reply context.'],
        ['title' => 'Daysie: multiple accounts and calendar context', 'url' => route('products.daysie'), 'description' => 'See an independent product in development and the identity, privacy, and changing-availability questions behind connected accounts.'],
        ['title' => 'Custom software development', 'url' => route('services.custom-software'), 'description' => 'For workflows that need a new application as well as connected tools, start with the first useful release.'],
    ]"
    :faqs="[
        ['Which tools can you connect?', 'Feasibility depends on the API, webhook, export options, permissions, and subscription of each tool. Bring the systems you use and the handoff you want to improve; I check what is possible before proposing the work.'],
        ['Should we automate the whole process at once?', 'Start with one recurring step and the exceptions around it. Payments, customer messages, and changes to important records may need approval or additional checks. Expand only when the first connection behaves as expected.'],
        ['What happens if an integration fails?', 'The scope defines retries, duplicate handling, action history, and notifications for exceptions. An unavailable service or expired connection should lead to a clear next action for the person responsible.'],
        ['How are cost and ongoing support handled?', 'The written scope separates implementation from third-party subscriptions and ongoing maintenance. Timing and fees depend on the systems, access, data, and failure cases involved. Support responsibilities are agreed before launch.'],
    ]"
/>
