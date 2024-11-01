<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Allowed fields for insert and update
    protected $allowedFields = [
        'title', 
        'description', 
        'image_path', 
        'status'
    ];

    /**
     * Retrieve all events or a specific event by ID.
     *
     * @param int|null $id Event ID (optional).
     * @return array|object|null List of events or a single event.
     */
    public function getEvent($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    /**
     * Retrieve events filtered by their status.
     *
     * @param string $status Status to filter by (e.g., 'ongoing', 'segera hadir').
     * @return array List of events with the specified status.
     */
    public function getEventsByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    /**
     * Add a new event to the database.
     *
     * @param array $data Event data to insert.
     * @return bool|int The inserted ID on success, or false on failure.
     */
    public function addEvent(array $data)
    {
        return $this->insert($data);
    }

    /**
     * Update an existing event by ID.
     *
     * @param int $id Event ID.
     * @param array $data Updated event data.
     * @return bool True on success, false on failure.
     */
    public function updateEvent($id, array $data)
    {
        return $this->update($id, $data);
    }

    /**
     * Delete an event by ID.
     *
     * @param int $id Event ID.
     * @return bool True on success, false on failure.
     */
    public function deleteEvent($id)
    {
        return $this->delete($id);
    }
}
