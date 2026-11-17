<x-service-page
    inquiry-service="support"
    title="Help With AI-Built Apps & Vibe Coding | Project 407"
    description="Get help with an app you built with AI. Kevin Whelan offers technical guidance, code review, focused fixes, and launch support while you keep building."
    eyebrow="AI-BUILT APP SUPPORT"
    headline="Help finishing and launching"
    accent="your AI-built app."
    intro="You started an app with AI and want to move it forward. I can help you work through a blocker, review your code, or prepare for real users. Keep building it yourself and bring me in for the parts where you need an experienced engineer."
    fit-heading="Get help with the part that’s holding you up."
    :problems="[
        ['You’re stuck on a problem that more prompts haven’t solved.', 'A feature keeps breaking, an integration won’t connect, or a change has affected something that worked before. You need help understanding the cause and choosing a fix.'],
        ['You want a second opinion while you keep building.', 'You have questions about the code, data model, or next feature. A focused conversation or code review can help you decide what to do next.'],
        ['You want to put the app in front of real users.', 'The demo works, but you need to check access to data, important user flows, deployment, and what happens when something fails.'],
    ]"
    :deliverables="[
        ['Technical guidance', 'Talk through the problem, review your approach, and leave with practical next steps you can work on yourself. A focused session can be the whole engagement.'],
        ['Code review before launch', 'Review the relevant code, permissions, integrations, and user flows. Get findings that distinguish issues to address before launch from improvements that can wait.'],
        ['Focused development and fixes', 'Bring me in to fix a bug, connect a service, or build an agreed feature. I explain what changed so you can continue developing the app.'],
        ['Deployment and launch support', 'Work through hosting, configuration, testing, and recovery needs for the agreed release. Decide who will operate and maintain the app after launch.'],
    ]"
    :outcomes="[
        ['A next step you understand', 'Know what is blocking progress and what to do about it, with the tradeoffs explained in plain language.'],
        ['Help at the level you need', 'Stay hands-on with your app and agree on the specific decisions or technical work you want me to handle.'],
        ['A clearer path to launch', 'Understand what has been checked, what needs attention, and what running the app will involve.'],
    ]"
    :stages="[
        ['title' => 'Show me where you are', 'description' => 'Share what the app should do, how you built it, and where you need help. A short description and a link or screenshot are enough for the first conversation. Leave passwords and sensitive customer data out.'],
        ['title' => 'Agree on one useful piece of work', 'description' => 'We decide whether guidance, a review, a specific fix, or launch support fits the problem. You receive the scope, fee, and availability before work begins. If an assessment is needed first, we agree on its cost and deliverable.'],
        ['title' => 'Work together and decide what follows', 'description' => 'For guidance, you get practical next steps. For development, we review the change and test the agreed behavior. You can continue on your own or discuss another piece of work when it is useful.'],
    ]"
    :related-links="[
        ['title' => 'The engineering judgment behind AI-assisted development', 'url' => route('approach'), 'description' => 'See how I use AI alongside code review, practical testing, and responsibility for software after launch.'],
        ['title' => 'Saydee: customer requests, quotes, and jobs', 'url' => route('products.saydee'), 'description' => 'Explore a product I built and the connected records and review steps behind it. Sample screens show how the workflow fits together.'],
        ['title' => 'Custom software development', 'url' => route('services.custom-software'), 'description' => 'If the next step is a larger build, define the application or release around what your users need to accomplish.'],
    ]"
    :faqs="[
        ['Can you help with an app I vibe coded?', 'Yes. Bring what you have, whether AI helped you write individual parts or you built mainly through prompts. We start with what the app should do and where you need help. The recommendation depends on the actual code, platform, and problem.'],
        ['Can I keep building the app myself?', 'Yes. You can keep making changes and use me for guidance, code review, or a specific technical task. We agree on who handles which work. A focused session or a small piece of development can be the whole engagement.'],
        ['Will I have to rebuild or move to another platform?', 'That depends on the app and the change you need. I review the relevant code, platform limits, and deployment options before recommending a move or rebuild. We discuss what is worth keeping and why a change would help.'],
        ['Can you help get my app launched?', 'Yes. We can define a release and work through the testing, permissions, integrations, hosting, and operational needs it involves. I explain what has been verified and what remains unresolved so you can make an informed launch decision.'],
        ['How much does guidance or technical help cost?', 'The fee depends on the question, existing code, and level of involvement. We agree on a guidance session, review, or defined piece of work before starting. Further development or ongoing support has its own agreed scope and fee.'],
    ]"
>
    <x-slot:introAction>
        <a href="{{ route('contact', ['service' => 'support']) }}#inquiry">TELL ME WHERE YOU’RE STUCK <span aria-hidden="true">↗</span></a>
    </x-slot:introAction>
</x-service-page>
