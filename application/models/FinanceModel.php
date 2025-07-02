<?php


class FinanceModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Load the database here
    }

    public function getAstrologerOverview()
    {
        // Get all astrologers
        $this->db->select('id, name');
        $astrologers = $this->db->get('astrologer_registration')->result();

        $result = [];

        foreach ($astrologers as $astro) {
            // Get income records for each astrologer
            $this->db->where('astrologer_id', $astro->id);
            $incomes = $this->db->get('astrologer_income')->result();

            $totalUsers = count($incomes);
            $lastActive = '';
            $totalAmount = 0;
            $paidAmount = 0;
            $paidCount = 0;

            foreach ($incomes as $income) {
                $amount = 10 * (int)$income->duration; // assume ₹10/min
                $totalAmount += $amount;
                if ($income->status === 'paid') {
                    $paidAmount += $amount;
                    $paidCount++;
                }

                if (!$lastActive || $income->created_at > $lastActive) {
                    $lastActive = $income->created_at;
                }
            }

            $result[] = [
                'id' => $astro->id,
                'name' => $astro->name,
                'total_users' => $totalUsers,
                'last_active' => $lastActive,
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'paid_count' => $paidCount,
                'chats' => $incomes
            ];
        }

        return $result;
    }
    public function markChatAsPaid($income_id)
    {
        $this->db->where('id', $income_id);
        return $this->db->update('astrologer_income', ['status' => 'paid']);
    }
   public function getPujariOverview()
{
    // Get all pujaris
    $this->db->select('id, name');
    $pujaris = $this->db->get('pujari_registration')->result();

    $result = [];

    foreach ($pujaris as $pujari) {
        // Fetch bookpuja requests for the pujari along with user name and puja name
        $this->db->select('b.*, u.user_name as name, p.puja_name');
        $this->db->from('bookpuja_request_by_user_to_pujari b');
        $this->db->join('users u', 'u.user_id = b.pujari_id', 'left');
        $this->db->join('puja p', 'p.puja_id = b.mob_puja_id', 'left'); // <-- JOIN with puja table
        $this->db->where('b.pujari_id', $pujari->id);
        $incomes = $this->db->get()->result();

        $totalUsers = count($incomes);
        $lastActive = '';
        $totalAmount = 0;
        $paidAmount = 0;
        $paidCount = 0;

        foreach ($incomes as $income) {
            $amount = $income->amount_paid_by_user;
            $totalAmount += $amount;

            if ($income->payment_status === 'paid') {
                $paidAmount += $amount;
                $paidCount++;
            }

            if (!$lastActive || $income->puja_date > $lastActive) {
                $lastActive = $income->puja_date;
            }
        }

        $result[] = [
            'id' => $pujari->id,
            'name' => $pujari->name,
            'total_users' => $totalUsers,
            'last_active' => $lastActive,
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'paid_count' => $paidCount,
            'chats' => $incomes  // contains user_name and puja_name now
        ];
    }

    return $result;
}

   public function markPujariChatAsPaid($income_id)
{
    $this->db->where('book_puja_id', $income_id);
    return $this->db->update('bookpuja_request_by_user_to_pujari', ['payment_status' => 'paid']);
}

}
