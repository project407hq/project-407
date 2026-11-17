<x-service-page
    title="Custom Software & Web Application Development | Project 407"
    description="Custom software development and help with AI-built apps. Work with Kevin Whelan on technical guidance, focused development, and launch support in MA, NH, and remotely."
    eyebrow="CUSTOM SOFTWARE DEVELOPMENT"
    headline="Custom software development for"
    accent="your business."
    intro="I build web applications, customer portals, and internal tools around the work your business needs done. Bring an idea or software you already have. We’ll agree on the next useful step, from technical guidance to development and launch."
    :problems="[['Your process lives across too many places.', 'Spreadsheets, inboxes, notes, and disconnected tools make the current state difficult to see.'], ['Commercial software does not fit the workflow.', 'Your team works around the platform instead of the platform supporting the work.'], ['A useful product idea needs to become real.', 'You need one experienced partner to help shape, design, build, and launch the first useful version.']]"
    :deliverables="[['Workflow discovery and product definition', 'I work through who needs the software, what they need to accomplish, and what belongs in the first release.'], ['Dashboards and internal tools', 'Tools that handle routine work automatically, with clear controls for setup, review, and exceptions.'], ['Customer portals and web applications', 'Secure, responsive experiences for customers, partners, or team members.'], ['Guidance and technical help for AI-built apps', 'Work through a blocker, review existing code, build a specific feature, or prepare for launch while you continue developing the app.']]"
    :outcomes="[['One source of truth', 'The team can see the information and status that matter without searching across tools.'], ['Less manual work', 'Repetitive steps and unnecessary re-entry are removed from the workflow.'], ['A foundation for your product', 'A focused application your customers can use, with a maintainable path for the next stage.']]"
    :engagements="[
        ['id' => 'build-an-application', 'title' => 'Build an application', 'description' => 'Define one workflow for a customer portal, internal tool, or first product release. Agree on the records, permissions, and useful first version before expanding.', 'deliverable' => 'A working release of the agreed application, with a plan for launch, access, and maintenance.'],
        ['id' => 'improve-existing-software', 'title' => 'Improve existing software', 'description' => 'Review the application and the change you need: a feature, a recurring problem, or a release that needs attention. Define a milestone around that specific piece of work.', 'deliverable' => 'The agreed change, tested against what it needs to do, with any remaining issues explained.'],
        ['title' => 'An AI prototype review', 'description' => 'Review the code, data access, integrations, and important user flows in an existing prototype. Decide what to keep, what to change, and what needs testing before release.', 'deliverable' => 'Written findings, the issues to address first, and a plan for getting ready to launch.'],
    ]"
    :stages="[
        ['title' => 'Define the release', 'description' => 'Discuss the users, current process, existing code, and constraints. If discovery is needed, agree on that scope and fee first.'],
        ['title' => 'Agree on investment and milestones', 'description' => 'Receive a written scope, assumptions, fees, payment schedule, and delivery plan. A defined project can use a fixed price; larger builds can be split into phases. Timing follows the agreed scope and availability.'],
        ['title' => 'Build, verify, and hand over', 'description' => 'Review working milestones, test the important behavior, and agree on deployment, access, recovery, and maintenance. Continued support is scoped separately or included explicitly.'],
    ]"
    :related-links="[
        ['title' => 'Help with an AI-built app', 'url' => route('services.ai-app-help'), 'description' => 'Keep building your app and bring me in for guidance, code review, a specific fix, or launch support.'],
        ['title' => 'Saydee: connected requests, quotes, and jobs', 'url' => route('products.saydee'), 'description' => 'Explore my own product, with sample screens showing review steps and connected customer, quote, and job records.'],
        ['title' => 'Business automation and API integrations', 'url' => route('services.automation-integrations'), 'description' => 'For a workflow that needs existing tools to communicate, start with the connection rather than a new application.'],
        ['title' => 'Fractional CTO and build-versus-buy advice', 'url' => route('services.fractional-cto'), 'description' => 'Get technical direction when you need to decide what to build, buy, or simplify before investing in implementation.'],
    ]"
    :faqs="[['Can you help with an app I vibe coded or built with AI?', 'Yes. Bring what you have, whether you used AI to assist with coding or built the app mainly through prompts. We can work through a blocker, review what needs attention, or agree on specific development and launch work. The starting point depends on the app and what you want to accomplish.'], ['Can I keep building the app myself?', 'Yes. You can stay hands-on and bring me in for guidance, code review, or a specific technical task. We agree on my involvement, the scope, and the fee before starting. A focused session or a small piece of work can be the whole engagement.'], ['Do I need a finished specification?', 'No. Start with the problem, who needs the software, and what you want to improve. Discovery defines the first useful version and a scope before implementation begins.'], ['Can you work with an existing application or team?', 'Yes. An engagement can focus on an existing system, an integration, or a release your team needs help delivering. Responsibilities and access are agreed before work starts.'], ['How much does custom software or technical help cost?', 'The scope, existing code, and level of involvement determine the investment and timing. I provide a written proposal explaining the work, cost, payment schedule, and when I can take it on. A guidance session or focused technical task can be scoped on its own. A smaller paid discovery phase can define the work when the requirements are still unclear.'], ['Will you help maintain the application?', 'Deployment, ownership, and maintenance are discussed before launch. Ongoing support or continued development has an agreed scope and fees.']]"
>
    <section id="ai-app-support" class="studio-section studio-section--muted" aria-labelledby="ai-app-heading">
        <div class="studio-split">
            <div>
                <p class="studio-kicker">GUIDANCE · TECHNICAL HELP · LAUNCH SUPPORT</p>
                <h2 id="ai-app-heading" class="studio-heading">Started an app with AI?</h2>
                <p class="service-examples__note">You can keep building the app yourself and bring me in for the parts where you need an experienced engineer. We agree on the scope and fee before starting.</p>
            </div>
            <div>
                <p class="studio-lead">Get practical guidance, help with a specific technical problem, or support getting the app into users’ hands. Explore the ways we can work together on an app you’ve already started.</p>
                <a class="studio-advisory__link" href="{{ route('services.ai-app-help') }}">GET HELP WITH YOUR AI-BUILT APP <span aria-hidden="true">↗</span></a>
            </div>
        </div>
    </section>
</x-service-page>
