CREATE TABLE IF NOT EXISTS public."project_user" (
    project_id uuid NOT NULL,
    user_id uuid NOT NULL,
    assigned_at timestamp DEFAULT CURRENT_TIMESTAMP,
    role varchar(100),

    PRIMARY KEY (project_id, user_id),
    FOREIGN KEY (project_id) REFERENCES public."projects"(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES public."users"(id) ON DELETE CASCADE
);