export type Todo = {
    id: number;
    title: string;
    expiration_date: string;
    completed_date: string | null;
    description: string | null;
    created_at: string;
    updated_at: string;
};
