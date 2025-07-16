CREATE TABLE IF NOT EXISTS public."tasks" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    project_id uuid NOT NULL,
    assigned_to uuid,
    title varchar(255) NOT NULL,
    description text,
    status varchar(50) DEFAULT 'pending',
    priority varchar(20),
    due_date date,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (project_id) REFERENCES public."projects"(id) ON DELETE CASCADE,
    FOREIGN KEY (assigned_to) REFERENCES public."users"(id) ON DELETE SET NULL
);