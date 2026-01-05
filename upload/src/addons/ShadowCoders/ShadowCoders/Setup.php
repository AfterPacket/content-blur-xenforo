<?php
namespace ShadowCoders\ShadowCoders;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Create;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUninstallTrait;
    use StepRunnerUpgradeTrait;

    public function installStep1()
    {
        // Create licenses table for managing licenses
        $this->schemaManager()->createTable(
            "xf_shadowcoders_licenses",
            function (Create $table) {
                $table->addColumn("license_id", "int")->autoIncrement();
                $table->addColumn("license_key", "varchar", 255);
                $table
                    ->addColumn("customer_email", "varchar", 255)
                    ->setDefault("");
                $table->addColumn("customer_domain", "varchar", 255);
                $table
                    ->addColumn("product_name", "varchar", 100)
                    ->setDefault("ShadowCoders");
                $table
                    ->addColumn("status", "enum")
                    ->values(["active", "suspended", "expired"])
                    ->setDefault("active");
                $table->addColumn("created_date", "int")->setDefault(0);
                $table->addColumn("expires_date", "int")->nullable();
                $table->addColumn("last_validation", "int")->setDefault(0);
                $table
                    ->addColumn("hardware_fingerprint", "varchar", 255)
                    ->nullable();
                $table->addPrimaryKey("license_id");
                $table->addUniqueKey("license_key");
                $table->addKey(["customer_domain", "status"]);
            },
        );
    }

    public function installStep2()
    {
        // Create options
        $this->createOptions();
        $this->createPermissions();
    }

    protected function createOptions()
    {
        $this->db()->insert(
            "xf_option_group",
            [
                "group_id" => "shadowcoders",
                "display_order" => 1000,
                "debug_only" => 0,
                "addon_id" => "ShadowCoders/ShadowCoders",
            ],
            "group_id = VALUES(group_id)",
        );
    }

    protected function createPermissions()
    {
        $db = $this->db();
        $addonId = "ShadowCoders/ShadowCoders";
        $permissionTitle = "permission.general_bypassBlur";
        $this->ensureGeneralInterfaceGroup();
        $permissionTitleColumn = $this->findFirstExistingColumn(
            "xf_permission",
            ["title", "phrase_title", "phrase"],
        );

        $permission = [
            "permission_group_id" => "general",
            "permission_id" => "bypassBlur",
            "permission_type" => "flag",
            "interface_group_id" => "general",
            "display_order" => 10,
            "addon_id" => $addonId,
        ];
        if ($permissionTitleColumn) {
            $permission[$permissionTitleColumn] = $permissionTitle;
        }
        if ($this->hasColumn("xf_permission", "depend_permission_group_id")) {
            $permission["depend_permission_group_id"] = "";
        }
        if ($this->hasColumn("xf_permission", "depend_permission_id")) {
            $permission["depend_permission_id"] = "";
        }
        $db->insert(
            "xf_permission",
            $permission,
            false,
            $this->buildOnDuplicateUpdate($permission),
        );
    }

    protected function ensureGeneralInterfaceGroup()
    {
        $exists = $this->db()->fetchOne(
            "SELECT interface_group_id FROM xf_permission_interface_group WHERE interface_group_id = 'general'",
        );
        if ($exists) {
            return;
        }

        $data = [
            "interface_group_id" => "general",
            "display_order" => 10,
            "addon_id" => "",
        ];
        if ($this->hasColumn("xf_permission_interface_group", "is_moderator")) {
            $data["is_moderator"] = 0;
        }
        if ($this->hasColumn("xf_permission_interface_group", "title")) {
            $data["title"] = "permissions";
        }
        if ($this->hasColumn("xf_permission_interface_group", "phrase_title")) {
            $data["phrase_title"] = "permissions";
        }
        if ($this->hasColumn("xf_permission_interface_group", "phrase")) {
            $data["phrase"] = "permissions";
        }

        $this->db()->insert("xf_permission_interface_group", $data);
    }

    protected function findFirstExistingColumn($table, array $candidates)
    {
        foreach ($candidates as $candidate) {
            if ($this->hasColumn($table, $candidate)) {
                return $candidate;
            }
        }
        return null;
    }

    protected function hasColumn($table, $column)
    {
        $row = $this->db()->fetchRow(
            "SHOW COLUMNS FROM {$table} LIKE ?",
            $column,
        );
        return (bool) $row;
    }

    protected function buildOnDuplicateUpdate(array $data)
    {
        $updates = [];
        foreach (array_keys($data) as $column) {
            $updates[] = "{$column} = VALUES({$column})";
        }
        return implode(", ", $updates);
    }

    public function uninstallStep1()
    {
        // Drop licenses table
        $this->schemaManager()->dropTable("xf_shadowcoders_licenses");

        // Remove options
        $this->db()->delete(
            "xf_option",
            "addon_id = ?",
            "ShadowCoders\ShadowCoders",
        );
        $this->db()->delete(
            "xf_option_group",
            "addon_id = ?",
            "ShadowCoders\ShadowCoders",
        );

        $this->db()->delete(
            "xf_permission",
            "addon_id = ?",
            "ShadowCoders/ShadowCoders",
        );
        $this->db()->delete(
            "xf_permission_interface_group",
            "addon_id = ?",
            "ShadowCoders/ShadowCoders",
        );
    }

    public function upgrade1000000Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000001Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000002Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000003Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000004Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000005Step1()
    {
        $this->createPermissions();
    }

    public function upgrade1000006Step1()
    {
        $this->createPermissions();
    }
}
